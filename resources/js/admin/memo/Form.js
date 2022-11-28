import AppForm from '../app-components/Form/AppForm';

Vue.component('memo-form', {
    mixins: [AppForm],
    props:['odependency', 'ddependency', 'admin_user'],
    data: function() {
        return {
            form: {
                odependency:  '' ,
                number_memo:  '' ,
                ref_obs:  '' ,
                date_doc:  '' ,
                date_entry:  '' ,
                date_exit:  '' ,
                ddependency:  '' ,
                admin_user:  '' ,

            },
            mediaCollections: ['gallery']
        }
    }

});
