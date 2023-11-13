<template>
    <div class="shop-filters">
        <form action="">
            <div class="shop-filters-top">
                <div class="shop-filters-top-produit">
                    <form @submit.prevent="sort" action="">
                        <!-- filter by departments -->
                        <div class="filter_department">
                            <select name="department" v-model="selectDepartment">
                                <option :value="department.id" v-for="department in this.departments">{{
                                    department.department_name }}</option>
                            </select>
                        </div>
                        <!-- filter by category -->
                        <div class="filter_category">
                            <select name="categories" v-model="selectCategory">
                                <option :value="categorie.id" v-for="categorie in this.categories">{{
                                    categorie.category_name }}</option>
                            </select>
                        </div>
                        <!-- filter by opening hours -->
                        <div class="filter_openingHours">
                            <select name=""  v-model="selectOpeningHours">
                                <optgroup :label="openingHours.day" v-for="openingHours in this.OpeningHours">
                                    <option :value="openingHours.morning_opening_hour">{{ openingHours.morning_opening_hour }}</option>
                                    <option :value="openingHours.morning_closing_hour">{{ openingHours.morning_closing_hour }}</option>
                                    <option :value="openingHours.afternoon_opening_hour">{{ openingHours.afternoon_opening_hour }}</option>
                                    <option :value="openingHours.afternoon_closing_hour">{{ openingHours.afternoon_closing_hour }}</option>
                                </optgroup>
                            </select>
                        </div>
                        <button type="submit">filtré</button>
                    </form>
                </div>
                <div class="shop-filters-top-departement">

                </div>
                <div class="shop-filters-top-region">

                </div>
            </div>
        </form>

    </div>
</template>

<script>
import { mapState, mapActions } from 'pinia';
import { useShopStore } from '../../stores/shopStore';
import axios from 'axios';

export default {
    data() {
        return {
            selectDepartment: null,
            selectCategory: null,
            selectOpeningHours: null,
        }
    },
    computed: {
        ...mapState(useShopStore, ['departments', 'categories', 'OpeningHours']),
    }, methods: {
        ...mapActions(useShopStore, ['filterShops']),
        sort() {
            this.filterShops({ department_id: this.selectDepartment, categoriy_id: this.selectCategory, OpeningHours_id: this.selectOpeningHours })
        }
    }
}
</script>

<style scoped></style>