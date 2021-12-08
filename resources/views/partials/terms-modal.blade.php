@if (setting('tos'))
<div class="modal fade" id="tos-modal" tabindex="-1" role="dialog" aria-labelledby="tos-label" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tos-label">@lang('Terms of Service')</h5>
                @guest
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @endguest
            </div>
            <div class="modal-body">
                @include('auth.tos')
            </div>
            <div class="modal-footer">
                @guest
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('Close')
                </button>
                @endguest

                @auth
                <form method="post" action="{{ route('acceptterms') }}">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        @lang('app.accept')
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endif