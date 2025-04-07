<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $data['post_title'] }}</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f8f8;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f8f8f8; padding: 30px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; padding: 20px; border-radius: 8px;">
                    <tr>
                        <td align="center" style="padding-bottom: 20px;">
                            <img src="https://bdinfluencer.com/post-details/{{ $data['post_image'] }}" alt="Blog Image" width="100%" style="max-width: 560px; height: auto; border-radius: 8px;" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-bottom: 10px;">
                            <a href="https://bdinfluencer.com/post-details/{{ $data['post_slug'] }}" style="text-decoration: none; color: #333333; font-size: 22px; font-weight: bold;">
                                {{ $data['post_title'] }}
                            </a>
                        </td>
                    </tr>
                    @php
                        $author = \App\Models\User::where('id', $data['author'])->first();
                        $authorName = $author ? $author->name : 'Unknown Author';
                    @endphp
                    <tr>
                        <td align="center" style="padding-bottom: 20px; color: #666666; font-size: 14px;">
                            Written by <strong>{{ $authorName }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <a href="https://bdinfluencer.com/post-details/{{ $data['post_slug'] }}" style="background-color: #007BFF; color: #ffffff; padding: 12px 24px; border-radius: 5px; text-decoration: none; display: inline-block; font-size: 14px;">
                                Read Full Blog Post
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
