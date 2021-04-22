# Refactoring med controller och router
Skapa controller-klasser för de routes du utvecklade i föregående uppggift.

Lägg till dessa controllers till den nya routerna.

När du är klar har du gjort refactoring på din kod från kmom01 och anpassat den till den nya strukturen i kmom02.

# Spel
[x] Skapa klasser för att skapa en webbsida där man kan spela Yatzy.

[x] Implementera en (eller flera) controller för att spela spelet i ramverket.

Skapa ett flödesschema som representerar hur du tänker lösa (del av) spelet. Spara som doc/yatzy/flowchart.{md,pdf,png} och gör till en del av ditt repo.

Skapa psudokod som visar hur du tänker lösa (del av) spelet. Spara som doc/yatzy/psuedocode.{md,pdf,png} och gör till en del av ditt repo.

[x] Man skall rulla sina tärningar, välja vilka man sparar, och slå om. Man har tre slag och fem tärningar. En vanlig Yatzy-omgång helt enkelt.

[x] I första versionen av ditt spel räcker det om man kan spela själv, som en träningsrunda. 

Som överkurs kan man spela flera spelare och där datorn kan vara en av spelarna.

[x] Det räcker om man kan spela den första delen av Yatzy med ettor till sexor, summa och bonus. 

Den andra delen som inleds med ett-par, två-par och så vidare är överkurs.

[x] Det räcker om man är tvingad att spela spelet uppifrån och ned i ordning. 

Som överkurs kan du implementera att man själv kan välja var man vill spara sina poäng.

[x] Se till att man når ditt spel via en länk “Yatzy” i navbaren för din webbsida.

# Publicera
När du är klar, kör make test för att köra alla testerna mot ditt repo. När man kör make test så bör det passera utan allvarliga felmeddelanden.

Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en dbwebb publishpure me och testköra den.

Committa alla filer till ditt repo och lägg till en ny tagg (2.0.*). Öka versionnumret om du lägger till ändringar (2.0.1, 2.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 2.0.0 och < 3.0.0.

Pusha upp repot till GitHub/GitLab, inklusive taggarna.



_____


view/yatzy: kastar tärningen, åstadkommer ny url.
router: ser till att url-en finns.
controller/yatzy: hanterar vad som händer när routern hänvisar till url-en. Renderar nästa vy?



