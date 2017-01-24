<div id="{{ $htmlId }}">
    <el-row type="flex" justify="end" style="margin-bottom: 15px;">
        <el-col :span="6">
            <el-input
                icon="search"
                placeholder="Search"
                v-model="search"
                @keyup.native.enter="handleSearch">
                <el-button slot="append" icon="search" @click="handleSearch">Search</el-button>
            </el-input>
        </el-col>
    </el-row>

    <el-row type="flex">
        <el-table
            :data="tableData"
            v-loading="loading"
            element-loading-text="Loading..."
            :default-sort="default_sort"
            border
            highlight-current-row
            @sort-change="handleSortChange"
            stripe
            style="width: 100%">

            @foreach($columns as $column)
                <el-table-column
                    prop="{{ $column->getAttribute() }}"
                    label="{{ $column->getLabel() }}">
                </el-table-column>
            @endforeach

        </el-table>
    </el-row>

    <el-row type="flex" justify="end" style="margin-top: 15px;">
        <el-pagination
          layout="prev, pager, next"
          @current-change="handlePageChange"
          :current-page="current_page"
          :page-size="page_size"
          :total="total_items">
        </el-pagination>
    </el-row>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/element-ui/1.1.6/theme-default/index.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/1.1.6/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>

<script type="text/javascript">
   var tableComments = new Vue({
        el: '#{{ $htmlId }}',

        data() {
            return {
                tableData: [],
                loading: true,

                current_page: 0,
                page_size: 15,
                total_items: 0,

                sort: null,
                order: null,

                search: '',
            }
        },

        computed: {
            default_sort() {
                return {
                    prop: this.sort,
                    order: this.order
                }
            }
        },

        methods: {
            handlePageChange(page) {
                this.fetchData(page);
            },

            handleSearch() {
                this.fetchData();
            },

            handleSortChange(sorting) {
                this.sort = sorting.prop
                this.order = sorting.order

                this.fetchData();
            },

            fetchData(page) {
                this.loading = true;

                // Pagination
                this.page = page || this.page

                formattedOrder = this.order == 'descending' ? 'desc' : 'asc';

                let params = {
                    page: this.page,
                    limit: this.page_size,
                    sort: this.sort,
                    order: formattedOrder,
                    search: this.search,
                }

                var self = this;
                this.getList(params).then(function (res) {
                    self.tableData = res.data.data

                    self.current_page = res.data.meta.pagination.current_page;
                    self.total_items = res.data.meta.pagination.total;
                    self.page_size = res.data.meta.pagination.per_page;

                    self.loading = false
                })
            },

            getList(params) {
                return axios.get('{{ $apiURL }}', {
                    params: params,
                })
            }
        },

        mounted() {
            this.fetchData();
        },
    });
</script>
