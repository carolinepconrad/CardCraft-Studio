| ID Number  | Name                       | Design                       | Inventory       | Type                     | Price                   | Greeting                                            |
|------------|----------------------------|------------------------------|-----------------|--------------------------|-------------------------|-----------------------------------------------------|
| 1, 2... etc| Unique helpful name of card| a link to the card's design  | # left in stock | physical 0 or digital 1  | $4.00 (price in dollars)| slogan on the card (recorded so as to be searchable)|                                                                          |
|SMALLINT(255)| CHAR(255)                 | TEXT(255)                    | SMALLINT(255)   |  BIT(1)                  | DOUBLE(255, 2)	         | CHAR(255)                                           |
 

| ID Number | Username                                      | Password                | First Name | Last Name | Address   |
|-----------|-----------------------------------------------|-------------------------|------------|-----------|-----------|
|1, 2... etc| identfying name for the user, set by the user | password stored as hash | first name | last name | address   |
|SMALLINT(255)| CHAR(255)                                   |CHAR(255)                | CHAR(255)  | CHAR(255) |TEXT(21845)|


