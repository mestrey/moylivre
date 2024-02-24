@forEach($books as $book)
<a href="{{ route('home') }}">
    <div class="py-4">
        <div class="grid sm:grid-cols-3 grid-cols-1 gap-y-2 sm:gap-y-0 sm:gap-x-4">
            <div class="">
                <div class="aspect-square rounded-xl overflow-hidden">
                    <img class="object-cover w-full h-full" src="{{ $book->image ?? 'https://fakeimg.pl/500x500/ffffff/000000?text=?&font=bebas' }}" alt="{{ $book->title }}">
                </div>
            </div>
            <div class="col-span-2 py-4">
                <div class="flex flex-col justify-between h-full sm:text-start text-center">
                    <div class="">
                        <div class="text-xl">
                            <div class="lg:hidden xs:hidden block">{{ mb_strimwidth($book->title, 0, 45, '...') }}</div>
                            <div class="lg:hidden xs:block hidden">{{ mb_strimwidth($book->title, 0, 50, '...') }}</div>
                            <div class="lg:block hidden">{{ mb_strimwidth($book->title, 0, 70, '...') }}</div>
                        </div>
                        <div class="text-sm">
                            <div>{{ implode(' - ', array_filter([$book->language, $book->publisher, $book->isbn])) }}</div>
                        </div>
                    </div>
                    <div>
                        <div>{{ $book->year ? $book->year . ', ' : '' }} {{ $book->author }}</div>
                        <div>
                            @if ($book->genres->count() > 0)
                            <div class="">Жанры: {{ implode(', ', $book->genres->pluck('name')->toArray()) }}</div>
                            @else
                            <div class="">Жанр: Без жанра</div>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-between flex-col 2xs:flex-row">
                        <div>Цена: <span class="font-bold">{{ $book->price === null || $book->price === 0 ? 'Бесплатно' : $book->price }}</span></div>
                        @inject('coords', 'App\Helpers\CoordsHelper')
                        <div class="font-bold">{{ $coords->getDisplayDistanceFromAuthUser($book->latitude, $book->longitude) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
@endforeach