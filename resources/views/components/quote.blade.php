@props(['quote', 'author'])

<div class="py-4 flex w-full justify-end text-end">
    <div class="md:w-[50%] xs:w-[75%] w-full">
        <div class="italic">
            {{ $quote }}
        </div>
        <div class="text-sm">
            {{ $author }}
        </div>
    </div>
</div>