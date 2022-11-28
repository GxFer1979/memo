<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Memo\BulkDestroyMemo;
use App\Http\Requests\Admin\Memo\DestroyMemo;
use App\Http\Requests\Admin\Memo\IndexMemo;
use App\Http\Requests\Admin\Memo\StoreMemo;
use App\Http\Requests\Admin\Memo\UpdateMemo;
use App\Models\Memo;
use App\Models\Dependency;
use App\Models\AdminUser;
use Carbon\Carbon;

use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PDF;

class MemoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMemo $request
     * @return array|Factory|View
     */
    public function index(IndexMemo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Memo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'odependency_id', 'number_memo', 'ref_obs', 'date_doc', 'date_entry', 'date_exit', 'ddependency_id', 'admin_user_id'],

            // set columns to searchIn
            ['id', 'number_memo', 'ref_obs']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.memo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.memo.create');

        $odependency = Dependency::all();
        $ddependency = Dependency::all();
        $admin_user = AdminUser::all();

        return view('admin.memo.create', compact('odependency', 'ddependency', 'admin_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMemo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMemo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['odependency_id']=  $request->getOdependencyId();
        $sanitized ['ddependency_id']=  $request->getDdependencyId();
        $sanitized ['admin_user_id']=  $request->getUserId();
        $sanitized ['date_entry']=Carbon::now();


        // Store the Memo
        $memo = Memo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/memos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/memos');
    }

    /**
     * Display the specified resource.
     *
     * @param Memo $memo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Memo $memo)
    {
        $this->authorize('admin.memo.show', $memo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Memo $memo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Memo $memo)
    {
        $this->authorize('admin.memo.edit', $memo);

        $odependency = Dependency::all();
        $ddependency = Dependency::all();
        $admin_user = AdminUser::all();
        return view('admin.memo.edit', [
            'memo' => $memo,
            'odependency' => $odependency,
            'ddependency' => $ddependency,
            'admin_user' => $admin_user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMemo $request
     * @param Memo $memo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMemo $request, Memo $memo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['odependency_id']=  $request->getOdependencyId();
        $sanitized ['ddependency_id']=  $request->getDdependencyId();
        $sanitized ['admin_user_id']=  $request->getUserId();

        // Update changed values Memo
        $memo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/memos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/memos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMemo $request
     * @param Memo $memo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMemo $request, Memo $memo)
    {
        $memo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMemo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMemo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Memo::whereIn('id', $bulkChunk)->delete();
                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
