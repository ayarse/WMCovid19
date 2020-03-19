<h1 align="center">Worldometers COVID-19 Scraper 👋</h1>
<p>
</p>

> 
> Gets the latest Coronavirus data from worldometers.info and generates a nice JSON response. If you want to include the file in your own PHP application, you can wrap the code into a function and return the array instead of encoding to JSON like I have or if you want you can directly use the JSON from the frontend.

## Default response is formatted like this.

```JSON
{
    "total": {
        "cases": "225,484",
        "deaths": "9,277",
        "recovered": "85,831",
        "number_of_countries": "176",
        "active_cases": "130,376",
        "closed_cases": "95,108"
    },
    "countries": [
        {
            "country": "China",
            "cases": "80,928",
            "deaths": "3,245",
            "recovered": "70,420",
            "active_cases": "7,263"
        },
        {
            "country": "Italy",
            "cases": "35,713",
            "deaths": "2,978",
            "recovered": "4,025",
            "active_cases": "28,710"
        }
    ]       
}
```

### 🏠 [Homepage](https://github.com/ayarse/WMCovid19)

## Author

👤 **@ayarse**

* Website: http://twitter.com/ayarse
* Github: [ayarse](https://github.com/ayarse)

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_