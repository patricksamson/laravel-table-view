<el-table-column
    {!! $column->getHtmlAttributes()->render() !!}>
    <template scope="scope">
        @include($column->getTemplate())
    </template>
</el-table-column>
