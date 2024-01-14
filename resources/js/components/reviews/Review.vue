<template>
    <div v-if="this.reviews" class="block">
        <div class="block-header">
            <div class="title">
                <h2>Comments</h2>
                <div class="tag">{{ this.reviews.length }}</div>
            </div>
         
        </div>
        <div class="writing">
            <form @submit.prevent="sendMessage">
                <textarea name="message" v-model="message" class="textarea" id=""></textarea>
                <div class="group-button">
                    <button class="btn"><i class="ri-at-line"></i></button>
                    <button class="btn primary">Send</button>
                </div>
            </form>


        </div>
        <div v-for="reviews in this.reviews" :key="reviews.id" class="comment">
            <div class="user-banner">
                <div class="user">
                    <div class="avatar">
                        <img :src="this.previewImage + reviews.user.profil_picture">
                        <span class="stat grey"></span>
                    </div>
                    <h5>{{ reviews.user.user_name }}</h5>
                </div>
                <button class="btn dropdown"><i class="ri-more-line"></i></button>
            </div>
            <div class="content">
                <p>{{ reviews.message }}</p>
            </div>
            <div class="footer">

                <span class="is-mute">{{ this.commentData(reviews.created_at) }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '../../stores/userStore';
import { useShopStore } from '../../stores/shopStore';
import { mapActions, mapState } from 'pinia';
import axios from "axios"
export default {
    props: ["reviews", "shop_id"],
    data() {
        return {
            previewImage: "http://[::1]:5173/public/images/",
            formData: new FormData()
        }
    }, computed: {
        ...mapState(useUserStore, ['id']),
        ...mapState(useShopStore, ['shops']),
    }, methods: {
        ...mapActions(useShopStore, ['setShop']),
        commentData(date) {
            const commentaireDate = new Date(date);
            const dateActuelle = new Date();
            const differenceEnMilliseconds = dateActuelle - commentaireDate;
            const secondes = Math.floor(differenceEnMilliseconds / 1000);
            const minutes = Math.floor(secondes / 60);
            const heures = Math.floor(minutes / 60);
            const jours = Math.floor(heures / 24);

            if (secondes < 60) {
                return secondes + " secondes";
            } else if (minutes < 60) {
                return minutes + " minutes";
            } else if (heures < 60) {
                return heures + " heures";
            } else if (jours < 60) {
                return jours + " jours";
            }
        }
        ,
        sendMessage() {
            this.formData.append('message', this.message)
            this.formData.append('user_id', this.id)
            this.formData.append('shop_id', this.shop_id)
            console.log('user_id', this.id);
            axios.post("http://127.0.0.1:8000/api/reviews", this.formData).then((res) => {
                console.log(this.shops.length);
                const useShop = useShopStore();
                useShop.$reset()
                this.setShop()
            }).catch((err) => console.log(err))
        }
    }
}
</script>

<style lang="scss" scoped>
.block {
    background: #fff;
    padding: 1rem;
    background: #ffffff;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 2px 1px rgba(0, 0, 0, 0.06), 0px 1px 1px rgba(0, 0, 0, 0.08);
    border-radius: 8px;
    display: block;
}

.block-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
}

.block-header .title {
    display: flex;
    align-items: center;
    gap: 1rem;

}

.block-header .title .tag {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 4px;
    background: #f7f7f7;
    color: #1c1c1c;
    text-align: center;
    padding: 0 4px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 1rem;
    line-height: 16px;
    border: 1px solid #e8e8e8;
    border-radius: 96px;
}

.writing {
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 24px;
    padding: 12px;
}

.writing .textarea {
    width: 100%;
    font-family: "Inter";
    color: #585757;
    appearance: none;
    border: 0;
    outline: 0;
    resize: none;
    font-size: 16px;
    line-height: 24px;
    overflow: hidden;
}

.writing:focus-within {
    border: 1px solid #0085ff;
    box-shadow: 0px 0px 2px 2px rgba(0, 133, 255, 0.15);
}

.writing .footer {
    margin-top: 12px;
    padding-top: 12px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.comment {
    display: grid;
    gap: 14px;
}

.comment .user-banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.comment .user-banner .user {
    gap: 8px;
    align-items: center;
    display: flex;
}

.comment .user-banner .user .avatar {
    height: 32px;
    width: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid transparent;
    position: relative;
    border-radius: 100px;
    font-weight: 500;
    font-size: 13px;
    line-height: 20px;
}

.comment .user-banner .user .avatar img {
    max-width: 100%;
    border-radius: 50%;
}

.comment .user-banner .user .avatar .stat {
    display: flex;
    position: absolute;
    right: -2px;
    bottom: -2px;
    display: block;
    width: 12px;
    height: 12px;
    z-index: 9;
    border: 2px solid #ffffff;
    border-radius: 100px;
}

.comment .user-banner .user .avatar .stat.green {
    background: #00ba34;
}

.comment .user-banner .user .avatar .stat.grey {
    background: #969696;
}

.comment .footer {
    gap: 12px;
    display: flex;
    align-items: center;
}

.comment:not(.comment:first-child) {
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid #e8e8e8;
}

.comment+.comment {
    padding-top: 12px;
}

.comment.reply {
    margin-left: 32px;
}

.group-radio {
    position: relative;
    display: flex;
    user-select: none;
    align-items: stretch;
}

.group-radio .button-radio {
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.06);
}

.group-radio .button-radio label {
    cursor: pointer;
    padding: 4px 8px;
    font-weight: 500;
    font-size: 14px;
    display: flex;
    height: 28px;
    align-items: center;
    line-height: 28px;
    transition: 0.2s ease;
}

.group-radio .button-radio:first-child {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    border-left: 1px solid #e8e8e8;
    border-top: 1px solid #e8e8e8;
    border-bottom: 1px solid #e8e8e8;
}

.group-radio .button-radio:last-child {
    border-top-right-radius: 8px;
    border-right: 1px solid #e8e8e8;
    border-top: 1px solid #e8e8e8;
    border-bottom: 1px solid #e8e8e8;
    border-bottom-right-radius: 8px;
}

.group-radio .button-radio input[type="radio"] {
    display: none;
}

.group-radio .button-radio input[type="radio"]:checked+label {
    background: #f7f7f7;
}

.group-radio .divider {
    width: 1px;
    background: #e8e8e8;
}

h5 {
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    color: #1c1c1c;
    letter-spacing: 0em;
    text-align: left;
}

.btn {
    appearance: none;
    background: transparent;
    border: 0;
    padding: 0;
    display: flex;
    font: inherit;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #1c1c1c;
    transition: 0.2s ease;
}

.btn i {
    color: #969696;
    font-size: 18px;
    transition: 0.15s ease-in-out;
}

.btn.primary {
    min-width: 64px;
    padding: 8px 12px;
    height: 40px;
    color: #fff;
    display: inline-flex;
    background: #0085ff;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 2px 1px rgba(0, 0, 0, 0.06), 0px
}
</style>