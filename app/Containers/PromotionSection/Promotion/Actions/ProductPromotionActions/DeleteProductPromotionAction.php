<?php

namespace App\Containers\PromotionSection\Promotion\Actions\ProductPromotionActions;

use App\Containers\CatalogSection\Product\Actions\Products\DeleteProductAction;
use App\Containers\PromotionSection\Promotion\Models\Promotion;
use App\Ship\Parents\Actions\Action;

class DeleteProductPromotionAction extends Action
{
    public function run(Promotion $promotion)
    {
        return app(DeleteProductAction::class)->run($promotion);
    }
}
