<div class="widget">
    <div class="tab-content">
        @include('admin.users.rols.tabs.permissionstorole')

        @include('admin.users.rols.tabs.searchuser',['tab'=>$tab, 'formtab'=>isset($formtab)?$formtab:null])
        <div class="clearfix"></div>
    </div>
</div>