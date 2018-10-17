import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

Nova.booting((Vue, router) => {
    Vue.component('index-date-time-picker', require('./components/IndexField'));
    Vue.component('detail-date-time-picker', require('./components/DetailField'));
    Vue.component('form-date-time-picker', require('./components/FormField'));
    Vue.component('vue-ctk-date-time-picker', VueCtkDateTimePicker);
});
