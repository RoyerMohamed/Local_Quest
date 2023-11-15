<template>
    <div data-aos="fade-left"  v-if="validationErrors">
        <ul class="alert alert-danger list-unstyled">
            <li v-for="(value, key) in validationErrors" :key="key">{{ value }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    name : 'ValidationErrors',

    props: ['errors'],

    computed: {
        validationErrors() {
            // on récupère les messages d'erreur à l'intérieur de l'objet errors en props
            let errors = Object.values(this.errors);
            errors = errors.flat();
            return errors;
        }
    }
}
</script>