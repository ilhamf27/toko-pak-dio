<?php

namespace App\Enums;

enum OrderStatusEnum:string{
    case DIBAYAR = 'dibayar';
    case DIKIRIM = 'dikirim';
    case DITERIMA = 'diterima;
}
