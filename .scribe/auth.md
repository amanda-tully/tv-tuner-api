# Authenticating requests

To authenticate requests, include a **`X-XSRF-TOKEN`** header with the value **`"{X-XSRF-TOKEN}"`**.

All authenticated endpoints are marked with a `requires authentication` badge in the documentation below.

All requests to this API must include the header X-XSRF-TOKEN.

The value for this header is obtained by calling the route `/sanctum/csrf-cookie` once.

This endpoint does not send any response data but will automatically set two cookies in your browser:

- laravel_session
- XSRF-TOKEN

Use the second cookie value as value for the header on subsequent requests.

If any of the API endpoints returns a 419 (token mismatch) error, you might have to request a new one. If the error persists or the cookie is not set, please contact any of the backend developrs.
