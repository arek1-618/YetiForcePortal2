{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
    <!-- tpl-Products-PaymentAfterPurchase-PaymentAfterPurchase -->
    <div>
    {if $STATUS==='OK'}
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{\App\Language::translate('LBL_THANK_YOU', $MODULE_NAME)}</h4>
            <p>{\App\Language::translate('LBL_THANK_YOU_FOR_SHOPPING', $MODULE_NAME)}</p>
            {if !empty($ORDER_URL)}
                <hr>
                <p class="mb-0"><a href="{$ORDER_URL}" class="btn btn-success">{\App\Language::translate('LBL_GO_TO_ORDER', $MODULE_NAME)}</a></p>
            {/if}
        </div>
    {else}
        <div class="alert alert-warning" role="alert">
            <p>{\App\Language::translate('LBL_UNSUCCESSFUL_TRANSACTION', $MODULE_NAME)}</p>
            {if !empty($ORDER_URL)}
                <hr>
                <p class="mb-0"><a href="{$ORDER_URL}" class="btn btn-danger">{\App\Language::translate('LBL_GO_TO_ORDER', $MODULE_NAME)}</a></p>
            {/if}
        </div>
    {/if}
    </div>
    <!-- /tpl-Products-PaymentAfterPurchase-PaymentAfterPurchase -->
{/strip}
