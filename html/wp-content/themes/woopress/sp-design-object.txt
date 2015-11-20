curl "https://api.scalablepress.com/v2/design" \
-u ":test_cZDtREd-ZdCqU7S8NsmBFw" \
-F "type=screenprint" \
-F "sides[front][artwork]=@image.eps" \
-F "sides[front][colors][0]=white" \
-F "sides[front][dimensions][width]=5" \
-F "sides[front][position][horizontal]=C" \
-F "sides[front][position][offset][top]=2.5" \
-F "customization[0][id]=customization-id"