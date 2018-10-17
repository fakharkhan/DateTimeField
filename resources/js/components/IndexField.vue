<template slot="value">
    <div>
        <p v-if="field.value" class="text-90">{{ localizedDateTime }}</p>
    </div>
</template>

<script>
    import { InteractsWithDates } from 'laravel-nova'

    export default {
        mixins: [InteractsWithDates],

        props: ['resource', 'resourceName', 'resourceId', 'field'],

        computed: {
            /**
             * Get the localized date time.
             */
            localizedDateTime() {
                return this.localizeDateTimeField(this.field)
            }
        },
    }
</script>
