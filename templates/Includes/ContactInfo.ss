<% with $SiteConfig %>
    <% if $ContactAddress %><p>$ContactAddressXML</p><% end_if %>

    <% if $ContactEmail || $ContactPhone %><p>
        <% if $ContactEmail %>Email: <a href="mailto:$ContactEmail">$ContactEmail</a><br/><% end_if %>
        <% if $ContactPhone %>Phone: $ContactPhone<% end_if %>
    </p><% end_if %>

    <% if $MiscContactInfo %><p>$MiscContactInfoXML</p><% end_if %>

    <% if $MapHTML %><div class="google-map">$MapHTML</div><% end_if %>
<% end_with %>
