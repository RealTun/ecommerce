<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lst_shoes = ['Nike Air Winflo 10 - Trắng Xanh', 'Nike Air Zoom Structure 25 - Trắng Xanh', 'Nike Revolution 7 - Đen Xanh', 'Nike Air Max SC - Đen Xám', 'Nike Air Zoom Pegasus 40 Premium - Xanh Lam', 'Nike Run Swift 3 - Đen Nâu', 'Nike Air Zoom Structure 25 - Xanh', 'Nike In-Season TR 13 - Xám', 'Nike MC Trainer 2 - Trắng Đỏ', 'Nike Air Winflo 10 - Đen Xanh', 'Nike E-Series AD - Đen Trắng', 'Nike Air Winflo 10 - Xám Xanh', 'Nike Revolution 7 - Xanh Lam', 'Nike Dunk Low Retro - Trắng Đỏ', 'Nike Ebernon Mid - Trắng', 'Nike Vomero 17 -  Đen Trắng', 'Nike Air Max Impact 4 - Navy Đen', 'Nike In-Season TR 13 - Đen Trắng', 'Nike MC Trainer 2 - Xám', 'Nike Air Zoom Pegasus 40 - Xám Xanh', 'Nike Air Zoom Structure 25 - Đen Xanh Lá', 'Nike Revolution 7 - Trắng Đỏ', 'Nike Renew Run 4 - Đen Đen', 'Nike Court Vision Mid - Trắng', 'Nike ReactX Infinity 4 - Đen Full', 'Nike Air Zoom Pegasus 40 - Đen Full', 'Nike Air Jordan 1 Low - Xanh Đen', 'Nike Metcon 9 EasyOn - Nâu', 'Nike Court Royale 2 Mid - Đen Trắng', 'Nike Air Max Command - Đen Trắng', 'Nike Air Max SYSTM - Platium', 'Nike Air Max Excee - Xám Vàng', 'Nike Jordan Max Aura 5 - Đen Trắng', 'Nike Jordan Fadeaway - Trắng Đen', 'Nike Air Max - Platinum', 'Nike Air Max Command Leather - Xanh Navy', 'Nike Air Max Command Leather - Đen', 'Nike Wearallday - Trắng Đen', 'Nike Killshot 2 Leather - Trắng Nâu', 'Nike Killshot 2 Leather - Trắng Đen', 'Nike Air Max Infinity 2 - Trắng', 'Nike Air Max Axis - Đen Trắng', 'Nike Air Max Axis - Trắng Đen', 'Nike Air Max SYSTM - Trắng Xanh Lá', 'Nike Court Royale - Trắng Đen', 'Nike Air Max Command - Xanh Đen', 'Nike Air Winflo 10 - Trắng Xanh', 'Nike Air Zoom Pegasus 40 Premium - Xám', 'Nike Court Vision Low - Trắng Xanh Lá', 'Nike Pegasus Turbo Next Nature - Camo', 'Nike Air Max SYSTM - Trắng Xanh', 'Nike ReactX Infinity 4 - Đen Trắng', 'Nike ReactX Infinity 4 - Xám', 'Nike ReactX Infinity 4 - Đen Xanh', 'Nike Revolution 7 - Đen', 'Nike Revolution 7 - Trắng', 'Nike Revolution 7 - Xám', 'Nike Revolution 7 - Đen Trắng', 'Nike Air Zoom Structure 25 - Đen Trắng', 'Nike Air Max SC - Xám Xanh', 'Nike Air Zoom Structure 25 - Xanh Đen', 'Nike Free RN NN 2023 - Đen Trắng', 'Nike Air Max Excee - Đen Đen', 'Nike Air Max AP - Trắng Navy', 'Nike Air Max Excee - Trắng Xanh Dương', 'Nike Ebernon Low Premium - Trắng Đen', 'Nike Jordan Stadium 90 - Trắng Đỏ', 'Nike Jordan Nu Retro 1 Low - Trắng Vàng', 'Nike Dunk Low Retro Premium - Xanh Trắng', 'Nike Dunk Low Retro Premium - Nâu Xanh', 'Nike Dunk Low Retro - Đen Trắng', 'Nike Dunk Low Retro - Trắng Maroon', 'Nike ACG Lowcate - Camo Đen', 'Nike SB Ishod Premium - Đen', 'Nike SB Alleyoop - Nâu Vàng', 'Nike SB Alleyoop - Đen Trắng Xanh'];
        return [
            'name' => fake()->unique()->randomElement($lst_shoes),
            'description' => fake()->paragraph(1),
            'price' => fake()->numberBetween(100, 1000),
            'category_id' => 1,
            'brand_id' => 1,
        ];
    }
}
