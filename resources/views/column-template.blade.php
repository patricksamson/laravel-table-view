<el-table-column
    label="{{ $column->getLabel() }}">
    <template scope="scope">
        @include($column->getTemplate())
    </template>
</el-table-column>
