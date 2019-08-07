<template>
    <div class="container">
        <div class="row profile">
            <div class="col-md-6">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <h2>نام :{{user.name}}</h2>
                        </div>
                        <div class="profile-usertitle-job">
                            <h3>سمت :{{user.role}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-content">
                    <h2>ایمیل :{{user.email}}</h2>
                </div>
                <router-link :to="{name:'edit_user',params:{id:user.id}}"><button class="btn btn-success">ویرایش</button></router-link>
            </div>

        </div>
        <router-link :to="{name:'users'}"><button class="btn btn-danger">بازگشت</button></router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },
        created() {
            this.$store.dispatch('getUserWithId', this.$route.params.id)
                .then(result => {
                    this.user = result.data.data;
                })
                .catch(error => {
                    this.$snotify.error(error);
                });
        },
    }
</script>

<style scoped>

</style>