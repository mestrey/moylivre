<?php

use App\Models\Book;
use App\Models\Collection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('book_collection', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Book::class)->constrained();
            $table->foreignIdFor(Collection::class)->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_collection');
    }
};
