<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <vue-ctk-date-time-picker
                    :id="field.name"
                    v-model="value"
                    class="w-full form-control"
                    :class="errorClasses"
                    :dusk="field.attribute"
                    :formatted="field.format"
                    :format="field.format"
                    :inline="field.inline"
            ></vue-ctk-date-time-picker>
        </template>
    </default-field>
</template>

<script>
    import {Errors, FormField, HandlesValidationErrors, InteractsWithDates} from 'laravel-nova'


    export default {
        mixins: [HandlesValidationErrors, FormField, InteractsWithDates],


        props: ['resourceName', 'resourceId', 'field'],

        data: () => ({ localizedValue: '' }),


        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {

                // Set the initial value of the field
                this.value = this.field.value || '';

                // If the field has a value let's convert it from the app's timezone
                // into the user's local time to display in the field
                if (this.value !== '') {
                    this.localizedValue = this.fromAppTimezone(this.value);
                }
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || '');
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = this.toAppTimezone(value);
            },
        },
    }
</script>
