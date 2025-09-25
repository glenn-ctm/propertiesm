<div x-data="switchUserOption()" x-init="loadUsers()" class="absolute w-full z-10">
    <div x-show="init" style="display: none">
        <div x-show="open" style="display: none" class="bg-green-400 p-2">
            <div class="text-red-600 text-sm">Development use only.</div>
            <div class="text-white">Logged In User: <span class="font-bold">{{ auth()->user() ? auth()->user()->type_name : 'null' }}</span></div>
            <div class="flex items-center py-2">
                <select x-model="selectedUserId" class="mr-2 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="0">Select User</option>
                    <template x-for="(user,index) in users" :key=index>
                        <option :value="user?.id" x-text="user?.type_name"></option>
                    </template>
                </select>
                <button @click="switchUser()" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                  Login
                </button>
            </div>
        </div>
        <div @click="open = !open" class="bg-green-500 px-2 py-1 inline cursor-pointer text-white">switch user</div>
    </div>
</div>

@push('script')
    <script>
        function switchUserOption(){
            return {
                init: false,
                open: false,
                selectedUserId: null,
                switchLoading: false,
                users: [],
                loadUsers() {
                    axios.get('/switch-users').then(response => {
                        if(response.data.length){
                            this.users = response.data;
                            this.init = true;
                        }
                    }).catch(err => {
                        console.log({err});
                    });
                },
                switchUser(){
                    if(+this.selectedUserId) {
                        this.switchLoading = true;
                        axios.patch('/switch-users/'+this.selectedUserId).then(response => {
                            const loggedUser = response.data;
                            this.switchLoading = false;
                            alert(`You logged as ${loggedUser.type_name}. Page needs to reload.`);
                            location.reload();
                        }).catch(err => {
                            console.log({err});
                        });
                    }
                }
            };
        }
    </script>
@endpush
