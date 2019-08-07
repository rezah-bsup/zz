<template>
    <div v-if="!$route.params.id">
        <form @submit.prevent="addUser(user)">
            <div class="form-group">
                <label for="exampleInputEmail1">نام کاربر</label>
                <br>
                <label style="color:red" v-if="errors.name" for="exampleInputEmail1">{{(errors.name)[0]}}</label>
                <input v-model="user.name" type="text" :class="[{red:errors.name},'form-control']" id=""
                       aria-describedby="emailHelp"
                       placeholder="نام کاربر را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ایمیل کاربر</label>
                <br>
                <label style="color:red" v-if="errors.email" for="exampleInputEmail1">{{(errors.email)[0]}}</label>
                <input v-model="user.email" type="email" :class="[{red:errors.email},'form-control']"
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="ایمیل کاربر را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">رمز کاربر</label>
                <br>
                <label style="color:red" v-if="errors.password"
                       for="exampleInputEmail1">{{(errors.password)[0]}}</label>
                <input v-model="user.password" type="password" :class="[{red:errors.password},'form-control']"
                       id="exampleInputPassword1"
                       placeholder="رمز کاربر را وارد کنید">
            </div>
            <div class="form-check">
                <label for="exampleInputPassword1">سمت کاربر را انتخاب کنید</label>
                <br>
                <label style="color:red" v-if="errors.role" for="exampleInputEmail1">{{(errors.role)[0]}}</label>
                <select v-model="user.role" :class="[{red:errors.role},'form-control']">
                    <option></option>
                    <option value="admin">مدیر</option>
                    <option value="user">کاربر</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
        </form>
    </div>

    <div v-else>
        <form @submit.prevent="updateUser(user)">
            <div class="form-group">
                <label for="exampleInputEmail1">نام کاربر</label>
                <br>
                <label style="color:red" v-if="errors.name" for="exampleInputEmail1">{{(errors.name)[0]}}</label>
                <input v-model="user.name" type="text" :class="[{red:errors.name},'form-control']" id=""
                       aria-describedby="emailHelp"
                       placeholder="نام کاربر را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ایمیل کاربر</label>
                <br>
                <label style="color:red" v-if="errors.email" for="exampleInputEmail1">{{(errors.email)[0]}}</label>
                <input v-model="user.email" type="email" :class="[{red:errors.email},'form-control']"
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="ایمیل کاربر را وارد کنید">
            </div>
            <div class="form-check">
                <label for="exampleInputPassword1">سمت کاربر را انتخاب کنید</label>
                <br>
                <label style="color:red" v-if="errors.role" for="exampleInputEmail1">{{(errors.role)[0]}}</label>
                <select v-model="user.role" :class="[{red:errors.role},'form-control']">
                    <option></option>
                    <option value="admin">مدیر</option>
                    <option value="user">کاربر</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">ویرایش اطلاعات</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    role: ''
                },
                errors: {}
            }
        },
        methods: {
            addUser(user) {
                this.$store.dispatch('addUser', user)
                    .then(result => {
                        this.$router.push({name: 'users'});
                        this.$snotify.success(result.data && result.data.message);
                    })
                    .catch(error => {
                        this.errors = this.$store.state.errors;
                        this.$snotify.error(error);
                    });
            },
            updateUser(user) {
                this.$store.dispatch('updateUser', user)
                    .then(result => {
                        this.$router.push({name: 'user-info', params: {id: user.id}});
                        this.$snotify.success(result.data && result.data.message);
                    })
                    .catch(error => {
                        this.errors = this.$store.state.errors;
                        this.$snotify.error(error);
                    });
            }
        },
        created() {
            if (this.$route.params.id) {
                this.$store.dispatch('getUserWithId', this.$route.params.id)
                    .then(result => {
                        this.user = result.data.data;
                    })
                    .catch(error => {
                        this.$snotify.error(error);
                    });
            }
        }
    }
</script>

<style scoped>
    .red {
        border: solid 1px red;
    }
</style>