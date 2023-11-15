<template>
    <ValidationErrors :errors="this.validationErrors"  v-if="this.validationErrors"/>
    <div class="container w-25">

        <form @submit.prevent="register" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" v-model="user_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" v-model="email">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" id="image" ref="image" class="form-control" name="image" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input required type="password" class="form-control" id="password" v-model="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import { mapActions } from 'pinia';
import { useUserStore } from '../../stores/userStore';
import ValidationErrors from '../utils/ValidationErrors.vue'


export default {
    name: 'register',
    components: { ValidationErrors },
    data() {
        return {
            formData: new FormData(),
            validationErrors: "",
        }
    },
    methods: {
        ...mapActions(useUserStore, ['setUser']),
        register() {
            this.formData.append('user_name', this.user_name)
            this.formData.append('email', this.email)
            this.formData.append('image', this.$refs.image.files[0] ) 
            this.formData.append('password', this.password)
           // console.log({user_name :this.user_name ,email: this.email ,image : this.$refs.image.files[0] , password :this.password},);
            axios.post('http://127.0.0.1:8000/api/users',{user_name :this.user_name ,email: this.email ,image : this.$refs.image.files[0] , password : this.password}, {headers: {
        'Content-Type': 'multipart/form-data'
      } })
                 .then(res => {
                    this.validationErrors = "" ; 
                    this.$router.push("/login")
                    console.log("res",res);
                })
                 .catch(err => {  
                    console.log("err",err);
                        this.validationErrors = err.response.data[0].errors
                } )
         }
    }
}
</script>

<style lang="scss" scoped></style>