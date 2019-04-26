/* {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} */
"use strict";
window.Products_ProceedToCheckout_Js = class extends Products_Tree_Js {
	constructor(container = $(".js-products-container")) {
		super(container);
		this.container = container;
	}
	registerEvents() {
		super.registerEvents();
		this.registerButtonBuy();
	}
	registerButtonBuy() {
		this.container.find(".js-buy").on("click", e => {
			this.order();
		});
	}
	order() {
		AppConnector.request(
			$.extend(
				{
					module: app.getModuleName(),
					action: "Buy"
				},
				params
			)
		).done(data => {
			if (data["success"] === true) {
				app.openUrl(
					"http://portal2/index.php?module=SSingleOrders&view=DetailView&record=" +
						data["result"]["id"]
				);
			}
		});
	}
};