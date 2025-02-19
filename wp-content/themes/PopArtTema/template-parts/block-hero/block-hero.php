<?php
$checkIn = get_field("check_in");
$heroBg = get_field("background_image");
$button = get_field("button_text");
$searchImg = get_field("search_image");
$checksImg = get_field("checks_image");
$personsImg = get_field("persons_image");

?>

<section class="block-hero">
    <div class="hero-bg" style="background-image: url(<?= $heroBg ?>)">
        <div class="container">
            <div class="title | js-hero">
                <?= get_field("title") ?>
            </div>
            <div class="search-bar | js-hero">
                <div class="search" style="background-image: url(<?= $searchImg ?>)">
                    <input
                        class="search-input"
                        id="input-field"
                        type="search"
                        placeholder=""
                        required />
                    <label for="input-field"><?= get_field("search") ?? "Search" ?></label>
                </div>
                <div class="checks">
                    <?php
                    if ($checkIn) : ?>
                        <div class="check-cal" style="background-image: url(<?= $checksImg ?>)">
                            <input type="date" id="hiddenDate" />
                            <input
                                class="checkIn"
                                id="dateInput"
                                type="text"
                                placeholder="<?= $checkIn ?>" />
                        </div>
                    <?php endif; ?>
                    <div class="check-cal" style="background-image: url(<?= $checksImg ?>)">
                        <input type="date" id="hiddenDateSecond" />
                        <input
                            class="checkOut"
                            id="dateInputSecond"
                            type="text"
                            placeholder="<?= get_field("check_out") ?>" />
                    </div>
                </div>
                <div class="persons-icon" style="background-image: url(<?= $personsImg ?>)">
                    <?php if (have_rows('persons_select')): ?>
                        <select name="persons" class="persons">
                            <?php while (have_rows('persons_select')): the_row();
                                $value = get_sub_field('value');
                                $text = get_sub_field('select_text');
                            ?>
                                <option value="<?= $value ?>"><?= $text ?></option>
                            <?php endwhile; ?>
                        </select>
                    <?php endif; ?>
                </div>
                <button type="submit"><?= $button ?></button>
            </div>
        </div>
</section>