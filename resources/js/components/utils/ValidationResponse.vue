<template>
    <div data-aos="fade-left" v-if="this.message" class=" pt-4 d-flex justify-content-center">
        <div class="alert alert-success text-center w-50  "  role="alert">
           <p>{{ this.message}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['message'],
}
</script>