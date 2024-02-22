<?php

namespace App\Enums;

enum Genre: int
{
    case ANTHROPOLOGY = 1;
    case ART_AND_DESIGN = 2;
    case BIOGRAPHY_AND_MEMOIR = 3;
    case BUSINESS = 4;
    case ECONOMICS = 5;
    case FANTASY = 6;
    case FOOD_AND_COOKING = 7;
    case FICTION = 8;
    case GRAPHIC_NOVELS_AND_COMICS = 9;
    case HEALTH_AND_WELLNESS = 10;
    case HISTORY = 11;
    case HOME_AND_GARDEN = 12;
    case HORROR = 13;
    case LITERATURE_STUDIES_AND_CRITICISM = 14;
    case MUSIC = 15;
    case MYSTERY = 16;
    case NONFICTION = 17;
    case PHILOSOPHY = 18;
    case POETRY = 19;
    case POLITICS_AND_GOVERNMENT = 20;
    case RELIGION_AND_SPIRITUALITY = 21;
    case ROMANCE = 22;
    case SCIENCE_AND_NATURE = 23;
    case SCIENCE_FICTION = 24;
    case SOCIOLOGY = 25;
    case TRAVEL = 26;

    public function name(): string
    {
        return match ($this) {
            Genre::ANTHROPOLOGY => 'Антропология',
            Genre::ART_AND_DESIGN => 'Искусство и дизайн',
            Genre::BIOGRAPHY_AND_MEMOIR => 'Биография и мемуары',
            Genre::BUSINESS => 'Бизнес',
            Genre::ECONOMICS => 'Экономика',
            Genre::FANTASY => 'Фэнтези',
            Genre::FOOD_AND_COOKING => 'Еда и кулинария',
            Genre::FICTION => 'Фантастика',
            Genre::GRAPHIC_NOVELS_AND_COMICS => 'Графические романы и комиксы',
            Genre::HEALTH_AND_WELLNESS => 'Здоровье и красота',
            Genre::HISTORY => 'История',
            Genre::HOME_AND_GARDEN => 'Дом и сад',
            Genre::HORROR => 'Хоррор',
            Genre::LITERATURE_STUDIES_AND_CRITICISM => 'Литература и критика',
            Genre::MUSIC => 'Музыка',
            Genre::MYSTERY => 'Мистика',
            Genre::NONFICTION => 'Нонфикшн',
            Genre::PHILOSOPHY => 'Философия',
            Genre::POETRY => 'Поэзия',
            Genre::POLITICS_AND_GOVERNMENT => 'Политика и право',
            Genre::RELIGION_AND_SPIRITUALITY => 'Религия и духовность',
            Genre::ROMANCE => 'Романтика',
            Genre::SCIENCE_AND_NATURE => 'Наука и природа',
            Genre::SCIENCE_FICTION => 'Научная фантастика',
            Genre::SOCIOLOGY => 'Социология',
            Genre::TRAVEL => 'Путешествия',
        };
    }
}
