<el-table-column
    label="{{ $column->getLabel() }}"
    {!! $column->getHtmlAttributes()->render() !!}>
    <template scope="scope">
        @include($column->getTemplate())
    </template>
</el-table-column>
