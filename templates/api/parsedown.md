# Parsedown

> Endpoint to convert Markdown content to HTML.

## Usage

Simply send a POST request to this endpoint with a text variable in body.

```bash
curl --location --request POST '{{HOST_URL}}/parsedown' \
--form 'text="#Title#
Welcome to the demo:
1. Write Markdown text on the left
2. Hit the __Parse__ button or `⌘ + Enter`
3. See the result to on the right
"'
```

[Back to home](/)