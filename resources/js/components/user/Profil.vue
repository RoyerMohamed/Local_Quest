<template >
    <ValidationErrors :errors="this.validationErrors" v-if="this.validationErrors" />
    <ValidationResponse :message="this.validationResponse" v-if="this.validationResponse" />
    <section class="container-fluid d-flex justify-content-between ">


        <div class="  text-center w-25">
            <h3 class="p-5"><strong>Modifier vos informations perso</strong> </h3>
            <form @submit.prevent="userUpdate" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" v-model="this.user_name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" v-model="this.email">
                </div>
                <div class="col-lg-8 profil_edit-import-img ">
                    <img v-bind:src="this.previewImage + this.image" alt="" srcset="">
                    <input ref="fileInput" type="file" name="image">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>


        <div class=" text-center w-25">
            <h3 class="p-5"><strong>Modifier votre mot de passe</strong> </h3>

            <form @submit.prevent="updatePassword">

                <div class="mb-3">
                    <label for="currentPassword" class="form-label">mot de passe acctuel</label>
                    <input name="currentPassword" type="password" class="form-control" id="currentPassword"
                        v-model="this.password">
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">nouveau mot de passe</label>
                    <input name="new_password" type="password" @keyup="validationMotDePass" class="form-control"
                        id="new_password" v-model="this.new_password">
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">mot de passe acctuel</label>
                    <input name="new_password_confirmation" type="password" class="form-control"
                        id="new_password_confirmation" v-model="this.new_password_confirmation">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </section>
</template>

<script>
import { mapWritableState, mapActions, mapState } from 'pinia'
import { useUserStore } from '../../stores/userStore';
import ValidationErrors from "../utils/ValidationErrors.vue"
import ValidationResponse from "../utils/ValidationResponse.vue"
import axios from 'axios';
export default {
    name: "Profil",
    components: { ValidationErrors, ValidationResponse },
    data() {
        return {
            previewImage: "http://[::1]:5173/public/images/",
            validationErrors: "",
            validationResponse: "",
            password: "",
            new_password: "",
            new_password_confirmation: "",
            formData: new FormData(),
        }
    }, components: {
        ValidationErrors,
        ValidationResponse
    },
    computed: {
        ...mapWritableState(useUserStore, ["id", "user_name", "email"]),
        ...mapState(useUserStore, ["image"]),
    },
    methods: {
        ...mapActions(useUserStore, ['setUser']),
        validationMotDePass() {
            console.log('hello');
        },
        userUpdate() {

            this.formData.append('user_name', this.user_name)
            this.formData.append('email', this.email)
            this.formData.append('image', this.$refs.fileInput.files[0] !== undefined ? this.$refs.fileInput.files[0] : null)
            for (var value of this.formData.values()) {
                console.log(value);
            }
           // console.log(this.formData.values());
        //    { user_name: this.user_name, email: this.email, image:  this.$refs.fileInput.files[0] !== undefined ? this.$refs.fileInput.files[0] : null }
            axios.put(`http://127.0.0.1:8000/api/users/${this.id}`,
             this.formData,
              { 'content-type': 'multipart/form-data' })
                .then(res => {
                    this.setUser(res.data.user);
                    this.validationResponse = res.data.message
                    this.validationErrors = "";
                    //console.log( res.data.message);
                    //this.$router.push('/')
                }).catch(err => {
                    this.validationResponse = ""
                    //console.log(err);
                    this.validationErrors = err.response.data[0].errors
                })
        },
        updatePassword() {

            console.log(this.new_password === this.new_password_confirmation);

            axios.put(`http://127.0.0.1:8000/api/update-password/${this.id}?`, {
                password: this.password,
                new_password: this.new_password,
                new_password_confirmation: this.new_password_confirmation
            }).then((res) => {
                console.log(res)
                this.validationResponse = res.data.message
                this.validationErrors = "";
            }).catch((err) => {
                console.log(err)
                this.validationResponse = ""
                this.validationErrors = err.response.data[0].errors
            })
        }
    }
}
</script>

<style lang="scss" scoped></style>