<template>
    <div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">email_verified_at</th>
                    <th scope="col">created_at</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in users" :key="index">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                    <td>{{ user.email_verified_at }}</td>
                    <td>{{ user.created_at }}</td>
                    <td>
                        <i class="fas fa-fw fa-user-check fa-lg text-success"
                           v-if="user.name" :title="user.name"></i>
                        <i class="fas fa-fw fa-user-times fa-lg text-danger"
                           v-else></i>
                    </td>
                    <td>
                        <router-link to="" v-if="user.id">
                            <button type="button" class="btn btn-outline-success btn-sm mr-2"
                                    v-if="user.id">
                                <i class="fa fa-search-plus"></i>
                            </button>
                        </router-link>
                        <router-link to="">
                            <button type="button" class="btn btn-outline-primary btn-sm mr-2"
                                    v-if="user.id">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </router-link>
                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="btn-toolbar" style='display:flex; justify-content:center;'>

            <div class="btn-group">
                <button :disabled="!links.prev" class="btn btn-dark" @click.stop="loadFirst">
                    first
                </button>
                <button @click="loadPrev" :disabled="!links.prev" class="btn btn-dark">
                    previous
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary">
                    {{meta.current_page}}
                </button>
            </div>

            <div class="btn-group">
                <button @click="loadNext" :disabled="!links.next" class="btn btn-dark">
                    next
                </button>
                <button :disabled="!links.next" class="btn btn-dark" @click="loadLast">
                    last
                </button>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                working:true,
                users: {},
                meta: {},
                links:{},
            }
        },
        methods: {
            loadData(url) {
                return new Promise((resolve, reject) => {
                    axios
                        .get(url)
                        .then(result => {
                            this.users = result.data.data;
                            this.meta = result.data.meta;
                            this.links = result.data.links;
                            resolve(result.data);
                        })
                        .catch(reject)
                        .finally(() => {
                            this.working = false;
                        });
                });
            },
            loadFirst() {
                this.loadData(this.links.first);
            },
            loadLast(){
                this.loadData(this.links.last);
            },
            loadPrev(){
                this.loadData(this.links.prev);
            },
            loadNext(){
                this.loadData(this.links.next);
            }
        },
        created() {
            this.$store.dispatch('getUsers')
                .then(result => {
                    this.users = result.data.data;
                    this.meta = result.data.meta;
                    this.links = result.data.links;
                })
                .catch(error => {
                    this.$snotify.error(error);
                });
        }
    }
</script>

<style scoped>

</style>