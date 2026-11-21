@props(['product', 'size' => null])

@php
    $visuals = [
        'backpack' => ['icon' => '🎒', 'label' => 'Mochila', 'theme' => 'berry'],
        'sweatshirt' => ['icon' => '🧥', 'label' => 'Buzo', 'theme' => 'rose'],
        'tumbler' => ['icon' => '🥤', 'label' => 'Termo', 'theme' => 'peach'],
        'notebook' => ['icon' => '📓', 'label' => 'Agenda', 'theme' => 'lilac'],
        'keychain' => ['icon' => '🔑', 'label' => 'Llavero', 'theme' => 'cherry'],
        'stickers' => ['icon' => '✨', 'label' => 'Stickers', 'theme' => 'sky'],
    ];
    $visual = $visuals[$product->image] ?? ['icon' => '🎀', 'label' => 'Favorito', 'theme' => 'rose'];
@endphp

<div class="product-art product-art--{{ $visual['theme'] }} {{ $size }}" aria-hidden="true">
    <span class="product-art__halo"></span>
    <span class="product-art__spark product-art__spark--one">✦</span>
    <span class="product-art__spark product-art__spark--two">✦</span>
    <span class="product-art__bow"><i></i><b></b><i></i></span>
    <span class="product-art__icon">{{ $visual['icon'] }}</span>
    <span class="product-art__label">{{ $visual['label'] }}</span>
</div>
