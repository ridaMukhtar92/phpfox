if (typeof $Core.Pages == 'undefined') $Core.Pages = {};

$Core.Pages.Claim = 
{
	approve : function(iClaimId)
	{
		if (confirm(oTranslations['pages.are_you_sure_you_want_to_transfer_ownership']))
		{
			$.ajaxCall('pages.approveClaim', 'claim_id=' + iClaimId);
		}
	},
	
	deny : function(iClaimId)
	{
		if (confirm(oTranslations['pages.are_you_sure_you_want_to_deny_this_claim_request']))
		{
			$.ajaxCall('pages.denyClaim', 'claim_id=' + iClaimId);
		}
	}
};