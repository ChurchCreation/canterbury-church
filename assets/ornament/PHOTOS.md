# Photography

**Every template now ships real photographs.** The earlier arrangement — Unsplash on
the demo only, generated placeholders in the zip — was based on a misreading, and it is
worth recording so nobody reinstates it.

## The licence, correctly

The [Unsplash License](https://unsplash.com/license) grants the right to *"download,
copy, modify, **distribute**, perform, and use images from Unsplash for free, including
for commercial purposes, without permission"*. Two restrictions: you may not sell
unmodified images, and you may not compile Unsplash photos to replicate a competing
service. Bundling a handful inside a website template is neither. Attribution is **not
required**.

What we had been applying instead was the **API Guidelines'** hotlinking rule — "all API
uses must use the hotlinked image URLs returned by the API". That governs API-driven
applications serving photos dynamically. It does not govern a template that ships a few
files. Over-applying it cost these templates their photography and left them looking
like wireframes.

We credit the photographers anyway, in each template's `CREDITS.md`. It costs nothing.

## What ships where

| | Photography |
|---|---|
| **Cornerstone** | CC0 cathedral naves (Wells, Chester, St Mary's Edinburgh) for the page heroes — better for a liturgical template than anything the search returned — plus Unsplash for clergy, series and the building gallery |
| **Threshold** | Unsplash throughout |

`build/unsplash.mjs` resolves slots to photos and caches them; `build/photos.mjs`
downloads, crops and encodes them to AVIF + JPEG and writes `CREDITS.md`. Mark a slot
`"keepLocal": true` in `images.json` to leave our own photography in place.

## The CC0 naves

Three cathedral interiors by David Iliff (User:Mdbeckwith) on Wikimedia Commons, all
**CC0** — public domain, no attribution, no restrictions:

- `Wells Cathedral Nave Photograph.jpg` — scissor arches, warm, symmetrical (Cornerstone's homepage)
- `Chester Cathedral Nave 1.jpg` — gilded lierne vault (visit, events, give)
- `St Marys Cathedral Nave Edinburgh.jpg` — narrower, Scottish Episcopal (sermons, about, contact)

## Drawn ornament

`core/ornament/` still holds the generated rose window, tracery, quarry glazing,
chevron, vault and labyrinth. Nothing uses them now that real photography is in place.
They are kept because a family that wants a licence-free, zero-weight option has one —
but be warned: a previous version of Threshold ran on generated panels alone and the
verdict was *"these graphs are so cheap looking"*. Photographs win.

**Churches should replace all of it with pictures of their own building and people.**
