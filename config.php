<?php

use Illuminate\Support\Str;

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'Modern Sign & Engraving Corp | Engraved Lamacoid and ADA Signs',
    'description' => 'Custom laser engraved lamacoids of all kinds for commercial, electrical and industrial applications.',
    'collections' => [],
    'selected' => fn($page, $section) => Str::contains($page->getPath(), $section),
    'homePageProducts' => [
        ['name' => 'Braille (ADA Signs)', 'description' => 'Braille signs are essential for individuals with visual impairments.'],
        ['name' => 'Safety Signs', 'description' => 'Improve safety by clearly marking control panels and valves.'],
        [
            'name' => 'Sliding Signs',
            'description' => 'Sliding signs provide current status of the room in a quick and clear fashion.'
        ],
        [
            'name' => 'Room ID Signs',
            'description' => 'Signs around your facility provide a professional finish and help to avoid possible confusion.'
        ],
        ['name' => 'Restroom', 'description' => 'Easily identify facility restrooms with a variety of symbols and sizes available.'],
        [
            'name' => 'Directional Signs',
            'description' => 'Avoid confusion. Help guests find their way around with these custom directional signs'
        ],
    ],
    'productPageProducts' => [
        [
            'name' => 'Electrical & Industrial Applications',
            'description' =>
                'Improve safety by clearly marking control panels and valves. ' .
                '<br />Common Uses:' .
                '<ul class="list-disc list-inside mt-4"><li>Electrical Labeling</li><li>Control Panel Markings</li><li>Transformer Nameplates</li></ul>',
            'imageSrc' => '/assets/images/lamacoid-electrical-panel-industrial.jpg',
            'imageAlt' => 'lamacoid electrical panel / industrial signs',
        ],
        [
            'name' => 'Braille (ADA Signs) ',
            'description' =>
                'Braille signs are essential for individuals with visual impairments. Our braille signs enable those who are visually impaired to be just as informed as everyone else in your facility. The raised dots represent everything from alphabet to punctuation marks to ensure every individual has an equal chance of getting around easily. ' .
                '<br />Commonly Used for:' .
                '<ul class="list-disc list-inside mt-4"><li>Washroom</li><li>Stairs</li><li>Exit</li><li>Elevator</li></ul>',
            'imageSrc' => '/assets/images/lamacoid-brail-sign.jpg',
            'imageAlt' => 'lamacoid brail sign',
        ],
        [
            'name' => 'Sliding Signs',
            'description' =>
                'Sliding signs provide current status of the room in a quick and clear fashion. ' .
                '<br />Commonly Used for:' .
                '<ul class="list-disc list-inside mt-4"><li>Occupied/Vacant</li><li>In Session/Available</li><li>Open/Closed</li><li>On Duty/Off Duty</li></ul>',
            'imageSrc' => '/assets/images/engraved-sliding-sign.jpg',
            'imageAlt' => 'Engraved sliding sign',
        ],
        [
            'name' => 'Restroom',
            'description' =>
                'Symbols depicting clearly what the washroom specifications are. <br />' .
                'Common Types:' .
                '<ul class="list-disc list-inside mt-4">' .
                '<li>Male</li><li>Female</li><li>Male/Female</li><li>Handicapped</li><li>MF HC</li>' .
                '</ul>',
            'imageSrc' => '/assets/images/lamacoid-restroom-signs.jpg',
            'imageAlt' => 'lamacoid  restroom / washroom signs',
        ],
        [
            'name' => 'Directional Signs',
            'description' =>
                'With arrows and words showing you where to go much confusion can be avoided.' .
                '<p class="mt-2"><strong>Room ID Signs</strong> -  Signs around your facility provide a professional finish and help avoid possible confusion. Including room signs, stairwells, corridors, turns in a hallway, these signs will surely provide staff and visitors more efficiency.</p>' .
                '<p class="mt-2"><strong>Stairwell Signs</strong> - A number on each floor is required for people to safely and easily get around your facility.</p>',
            'imageSrc' => '/assets/images/direction-signs (2).jpg',
            'imageAlt' => 'lamacoid directional signs',
        ],
    ],
];
