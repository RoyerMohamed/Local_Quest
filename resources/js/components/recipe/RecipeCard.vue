<template>
   <div class="recipe_card">
    <div class="recipe_card_image">
        <img :src="this.previewImage + this.recipe.images[0].image_name" alt="" srcset="">    
    </div>
    <div class="recipe_card_infos">
        <div class="recipe_card_infos_title">
            <h3>{{ this.recipe.recipe_title }}</h3>
        </div>
        <div class="recipe_card_infos_diff">
            <h3>{{ this.recipe.difficulty }}</h3>
        </div>
        <div class="recipe_card_infos_nbPers">
            <h3>{{ this.recipe.num_persons }}</h3>
        </div>
        <div class="recipe_card_infos_time">
            <h3>{{ this.recipe.preparation_time }}</h3>
        </div>
    </div>
    <div class="recipe_card_link">
        <router-link class="btn btn-primary" :to="`/recipe/${this.recipe.id}`">en savoir plus</router-link>
    </div>
   </div>
</template>

<script>
export default {
    props: ['recipe'],
    data() {
        return{
            previewImage: "http://[::1]:5173/public/images/",
        }
    },
}
</script>

<style lang="scss" scoped></style>
