import AppForm from '../app-components/Form/AppForm';

Vue.component('dependency-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                code:  '' ,
                name:  '' ,
                ncl:  '' ,
                
            }
        }
    }

});