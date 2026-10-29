<?php

namespace App\Enums;

enum Color: string
{
    case Black = 'black';
    case White = 'white';
    case Grey = 'grey';
    case Red = 'red';
    case Blue = 'blue';
    case Green = 'green';
    case Yellow = 'yellow';
    case Orange = 'orange';
    case Brown = 'brown';
    case Pink = 'pink';
    case Purple = 'purple';
    case Multicolor = 'multicolor';

    public function label(): string
    {
        return match ($this) {
            self::Black => 'Noir',
            self::White => 'Blanc',
            self::Grey => 'Gris',
            self::Red => 'Rouge',
            self::Blue => 'Bleu',
            self::Green => 'Vert',
            self::Yellow => 'Jaune',
            self::Orange => 'Orange',
            self::Brown => 'Brun',
            self::Pink => 'Rose',
            self::Purple => 'Mauve',
            self::Multicolor => 'Multicolore',
        };
    }

    public function badgeClasses(): string
    {
        return match ($this) {
            self::Black => 'bg-slate-800 text-white',
            self::White => 'bg-white text-slate-700 ring-1 ring-slate-300',
            self::Grey => 'bg-slate-200 text-slate-800',
            self::Red => 'bg-red-100 text-red-800',
            self::Blue => 'bg-blue-100 text-blue-800',
            self::Green => 'bg-green-100 text-green-800',
            self::Yellow => 'bg-yellow-100 text-yellow-900',
            self::Orange => 'bg-orange-100 text-orange-800',
            self::Brown => 'bg-amber-200 text-amber-900',
            self::Pink => 'bg-pink-100 text-pink-800',
            self::Purple => 'bg-purple-100 text-purple-800',
            self::Multicolor => 'bg-linear-to-r from-pink-100 via-yellow-100 to-sky-100 text-slate-800',
        };
    }
}
