<el-table-column
    label="{{ $column->getLabel() }}">
    <template scope="scope">
        {!! $column->getTemplate() !!}
    </template>
</el-table-column>
