import AppForm from '../app-components/Form/AppForm';

Vue.component('memo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                odependency_id:  '' ,
                number_memo:  '' ,
                ref_obs:  '' ,
                date_doc:  '' ,
                date_entry:  '' ,
                date_exit:  '' ,
                ddependency_id:  '' ,
                admin_user_id:  '' ,

            },
            mediaCollections: ['gallery']
        }
    }

});
