<template>
    <RecipeCard v-if="this.recipes" v-for="recipe in this.recipes" :recipe="recipe" />
</template>

<script>
import { mapState } from 'pinia';
import { useRecipeStore } from '../../stores/recipeShop';
import RecipeCard from './RecipeCard.vue'

export default {
    data() {

    }, computed: {
        ...mapState(useRecipeStore, ["recipes"])
    }, components: {
        RecipeCard
    }

}
</script>

<style lang="scss" scoped></style>