# time-based-redirect

Redirects to different URLs (e.g. calls, events) based on the time.

# Requirements

Server with PHP.

# Usage

## Create JSON File

Create a *eventname.json* in the *events* sub directory. You can configure the
name of the subdirectory in *index.php* (define("EVENT_DIR", "./events/");)

At the moment, there is no alternative to create and update an event to
the JSON file.

### Format

```
{
  "configuration": {
    "offset": 0
  },
  "events": [
    {
      "start-time": "2019-09-07T15:50+01:00",
      "end-time": "2019-09-07T15:50+01:00",
      "url": "https://target.url/abc"
    },
    {
      "start-time": "2019-09-07T15:50+01:00",
      "end-time": "2019-09-07T15:50+01:00",
      "url": "https://target.url/xyz"
    }
  ]
}

```

### Parameters

*offset:* Time in minutes before and after an event that a user is redirected to
a specific URLS. The offset must be smaller than the smallest amount of time
between two events. Default: 0

*start-time, end-time:* The time when an event starts or finishes. Must be in
[PHP compatible format](https://www.php.net/manual/de/datetime.formats.time.php)

*url:* the URL callin redirects to between start-time and end-time.

## Link to an event

Point the participant to {baseurl}?event=eventname
where *eventname* is the name of the JSON file specified above.

Between start-time and end-time the participant will be redirected to the
respective call.
