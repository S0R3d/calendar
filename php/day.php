<div class="day" id="<?php echo $daysName[$i % 7]; ?>">
    <div class="date">
        <div class="date-name"></div>
        <div class="date-numb"></div>
    </div>
    <div class="other-evt">
        <!-- Altri... da sostituitre con Altri[numero di eventi rimossi] con select nel db -->
        <!-- non ci deve essere sempre ma solo se c'è un numero di eventi per quel giono > 3 (da 4 in piu) e si stampa solo i primi 2 per ordine di orario, se non ci sono full-day poi il div.other-evt-->
        Altri...
    </div>
</div>