<template lang="">
    <div>
        <div class="d-flex align-items-start">
            <div class="me-2">
                <h5 class="card-title mb-4">{{ title }}</h5>
            </div>

            <div class="ms-auto">
                <div class="text-sm-end">
                    <a type="button" :href="link"
                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                        <i class="mdi mdi-plus me-1"></i> {{ button }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        title: String,
        button : String,
        link: String
    },
}
</script>
<style lang="">
    
</style>