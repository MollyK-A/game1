# Skapa en test suite för dina klasser
Din Makefile skall stödja make phpunit och make test så som exempelkoden använder det.

Din test suite skall placeras i katalogen test/ och den katalogen skall innehålla en konfigurationsfil config.php.

Du får gärna skriva om dina klasser för att göra dem mer testbara, om det känns rimligt. Snygg och ren kod är ofta testbar kod.

Skriv enhetstester för att testa dina egna klasser och funktioner.

Försök även få med kod i config/ så att den omfattas av din kodtäckning och du kan visuellt se hur väl dina testfall täcker även de filerna.

Försök nå 100% kodtäckning av all din kod. Om du inte lyckas med det så försöker du nå så hög kodtäckning som du anser vara rimligt med skäliga medel.

# Publicera
När du är klar, kör make test för att köra alla testerna mot ditt repo. När man kör make test så bör det passera utan allvarliga felmeddelanden.

Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en dbwebb publishpure me och testköra den.

Committa alla filer till ditt repo och lägg till en ny tagg (3.0.*). Öka versionnumret om du lägger till ändringar (3.0.1, 3.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 3.0.0 och < 4.0.0.

Pusha upp repot till GitHub/GitLab, inklusive taggarna.