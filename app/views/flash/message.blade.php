@if (Session::has('flash_message'))
<?php $flash = Session::get('flash_message'); ?>
<div class="alert alert-dismissable alert-{{{ (array_key_exists('alert', $flash)) ? $flash['alert'] : 'info' }}}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{{ array_key_exists('callout', $flash) ? $flash['callout'] : 'Heads Up!' }}}</strong> {{{ array_key_exists('message', $flash) ? $flash['message'] : '' }}}
</div>
@endif